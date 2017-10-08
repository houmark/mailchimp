<?php

namespace Sup7even\Mailchimp\Domain\Model\Dto;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class FormDto extends AbstractEntity
{

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /**
     * @var string
     * @validate NotEmpty
     * @validate EmailAddress
     */
    protected $email;

    /** @var array */
    protected $interests;

    /** @var string */
    protected $interest;

    /** @var string */
    protected $mergeField1;

    /** @var string */
    protected $mergeField2;

    /** @var string */
    protected $mergeField3;

    /** @var string */
    protected $mergeField4;

    /** @var string */
    protected $mergeField5;

    /** @var string */
    protected $mergeField6;

    /** @var string */
    protected $mergeField7;

    /** @var string */
    protected $mergeField8;

    /** @var string */
    protected $mergeField9;

    /** @var string */
    protected $mergeField10;

    /** @var string */
    protected $formName;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param array $interests
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
    }

    /**
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    /**
     * @return string
     */
    public function getMergeField1()
    {
        return $this->mergeField1;
    }

    /**
     * @param string $mergeField1
     */
    public function setMergeField1($mergeField1)
    {
        $this->mergeField1 = $mergeField1;
    }

    /**
     * @return string
     */
    public function getMergeField2()
    {
        return $this->mergeField2;
    }

    /**
     * @param string $mergeField2
     */
    public function setMergeField2($mergeField2)
    {
        $this->mergeField2 = $mergeField2;
    }

    /**
     * @return string
     */
    public function getMergeField3()
    {
        return $this->mergeField3;
    }

    /**
     * @param string $mergeField3
     */
    public function setMergeField3($mergeField3)
    {
        $this->mergeField3 = $mergeField3;
    }

    /**
     * @return string
     */
    public function getMergeField4()
    {
        return $this->mergeField4;
    }

    /**
     * @param string $mergeField4
     */
    public function setMergeField4($mergeField4)
    {
        $this->mergeField4 = $mergeField4;
    }

    /**
     * @return string
     */
    public function getMergeField5()
    {
        return $this->mergeField5;
    }

    /**
     * @param string $mergeField5
     */
    public function setMergeField5($mergeField5)
    {
        $this->mergeField5 = $mergeField5;
    }

    /**
     * @return string
     */
    public function getMergeField6()
    {
        return $this->mergeField6;
    }

    /**
     * @param string $mergeField6
     */
    public function setMergeField6($mergeField6)
    {
        $this->mergeField6 = $mergeField6;
    }

    /**
     * @return string
     */
    public function getMergeField7()
    {
        return $this->mergeField7;
    }

    /**
     * @param string $mergeField7
     */
    public function setMergeField7($mergeField7)
    {
        $this->mergeField7 = $mergeField7;
    }

    /**
     * @return string
     */
    public function getMergeField8()
    {
        return $this->mergeField8;
    }

    /**
     * @param string $mergeField8
     */
    public function setMergeField8($mergeField8)
    {
        $this->mergeField8 = $mergeField8;
    }

    /**
     * @return string
     */
    public function getMergeField9()
    {
        return $this->mergeField9;
    }

    /**
     * @param string $mergeField9
     */
    public function setMergeField9($mergeField9)
    {
        $this->mergeField9 = $mergeField9;
    }

    /**
     * @return string
     */
    public function getMergeField10()
    {
        return $this->mergeField10;
    }

    /**
     * @param string $mergeField10
     */
    public function setMergeField10($mergeField10)
    {
        $this->mergeField10 = $mergeField10;
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * @param string $formName
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;
    }

}
