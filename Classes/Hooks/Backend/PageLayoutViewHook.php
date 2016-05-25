<?php

namespace Sup7\Mailchimp\Hooks\Backend;

use Sup7\Mailchimp\Service\ApiService;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PageLayoutViewHook
{
    /**
     * Extension key
     *
     * @var string
     */
    const KEY = 'mailchimp';

    /**
     * Path to the locallang file
     *
     * @var string
     */
    const LLPATH = 'LLL:EXT:mailchimp/Resources/Private/Language/locallang.xml:';

    /**
     * Table information
     *
     * @var array
     */
    protected $tableData = [];

    /**
     * @var array
     */
    protected $flexformData = [];

    /** @var  DatabaseConnection */
    protected $databaseConnection;

    /** @var ApiService */
    protected $api;

    public function __construct()
    {
        /** @var DatabaseConnection databaseConnection */
        $this->databaseConnection = $GLOBALS['TYPO3_DB'];
        $this->api = GeneralUtility::makeInstance('Sup7\\Mailchimp\\Service\\ApiService');
    }


    public function getExtensionSummary(array $params = array())
    {
        $this->flexformData = GeneralUtility::xml2array($params['row']['pi_flexform']);

        $result = '<strong>' . htmlspecialchars($this->getLanguageService()->sL(self::LLPATH . 'plugin.title')) . '</strong><br>';

        $this->getListInformation();
        $this->getInterestGroupInformation();

        $result .= $this->renderSettingsAsTable();
        return $result;
    }

    protected function getListInformation()
    {
        $listId = $this->getFieldFromFlexform('settings.listId');
        if (!$listId) {
            $this->tableData[] = array(
                $this->getLabel('flexform.list'),
                '<div class="alert alert-warning">No list selected</div>'
            );
        } else {
            $list = $this->api->getList($listId);
            $this->tableData[] = array(
                $this->getLabel('flexform.list'),
                sprintf('<strong>%s</strong>', htmlspecialchars($list['name']))
            );
            $this->tableData[] = array(
                $this->getLabel('memberCount'),
                (int)$list['stats']['member_count']
            );
        }
    }

    protected function getInterestGroupInformation()
    {
        $interestId = $this->getFieldFromFlexform('settings.interestId');
        $listId = $this->getFieldFromFlexform('settings.listId');
        if ($listId && $interestId) {
            $interests = $this->api->getCategories($listId, $interestId);

            if ($interests) {
                $this->tableData[] = array(
                    $this->getLabel('flexform.interests'),
                    $interests['title']
                );
            }
        }
    }

    /**
     * @param string $string
     * @return string
     */
    protected function getLabel($string)
    {
        return $this->getLanguageService()->sL(self::LLPATH . $string);
    }

    /**
     * Return language service instance
     *
     * @return \TYPO3\CMS\Lang\LanguageService
     */
    public function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }

    /**
     * Render the settings as table for Web>Page module
     * System settings are displayed in mono font
     *
     * @return string
     */
    protected function renderSettingsAsTable()
    {
        if (count($this->tableData) == 0) {
            return '';
        }

        $content = '';
        foreach ($this->tableData as $line) {
            $content .= '<strong>' . $line[0] . '</strong>' . ' ' . $line[1] . '<br />';
        }

        return '<pre style="white-space:normal">' . $content . '</pre>';
    }

    /**
     * Get field value from flexform configuration,
     * including checks if flexform configuration is available
     *
     * @param string $key name of the key
     * @param string $sheet name of the sheet
     * @return string|NULL if nothing found, value if found
     */
    protected function getFieldFromFlexform($key, $sheet = 'sDEF')
    {
        $flexform = $this->flexformData;
        if (isset($flexform['data'])) {
            $flexform = $flexform['data'];
            if (is_array($flexform) && is_array($flexform[$sheet]) && is_array($flexform[$sheet]['lDEF'])
                && is_array($flexform[$sheet]['lDEF'][$key]) && isset($flexform[$sheet]['lDEF'][$key]['vDEF'])
            ) {
                return $flexform[$sheet]['lDEF'][$key]['vDEF'];
            }
        }

        return null;
    }

}
