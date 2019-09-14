<?php

namespace App\Traits;


trait HasAuthorizeForm
{
    /**
     * Indicates if the model should be authorizeForm.
     *
     * @var bool
     */
    public $authorizeForm = true;

    /**
     * Update the model's update timestamp.
     *
     * @return bool
     */
    public function touch()
    {
        if (! $this->usesAuthorizeForm()) {
            return false;
        }

        $this->updateAuthorizeForm();

        return $this->save();
    }

    /**
     * Update the creation and update authorizeForm.
     *
     * @return void
     */
    protected function updateAuthorizeForm()
    {
        $defult_status  = $this->freshRecordState();


        if (! is_null(static::RECORD_STATE_ID) && ! $this->isDirty(static::RECORD_STATE_ID)) {
            // for create new
            if(!$this->exists)
            {
                $this->setRecordState($defult_status);
            }
            //
            else{

            }
        }
    }

    /**
     * Set the value of the "record state id" attribute.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function setRecordState($value)
    {
        $this->{static::RECORD_STATE_ID} = $value;

        return $this;
    }

    /**
     * Get a fresh Record State for the model.
     *
     * @return integer
     */
    public function freshRecordState()
    {
        return static::RECORD_STATE_PENDING;
    }

    /**
     * Determine if the model uses authorizeForm.
     *
     * @return bool
     */
    public function usesAuthorizeForm()
    {
        return $this->authorizeForm;
    }

    /**
     * Get the name of the "record state id" column.
     *
     * @return string
     */
    public function getRecordStateColumn()
    {
        return static::RECORD_STATE_ID;
    }
}
