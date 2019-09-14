<?php

namespace App\Traits;

use App\Enums\StateEnum;

trait RecordStateEditable {
    /**
     * Check whether the record is editable in current state
     * @param $state
     * @return bool
     */
    public function isEditableState($state) {
        return $state == StateEnum::RejectedVerified || $state == StateEnum::RejectedApproved || $state == StateEnum::Revised;
    }

    /**
     * @param $state
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditableStateWarning($state) {
        $isEditable = $this->isEditableState($state);
        $stateDescription = StateEnum::getDescription($state);

        return view('auth.editable-state-warning', compact('isEditable', 'stateDescription'));
    }
}
