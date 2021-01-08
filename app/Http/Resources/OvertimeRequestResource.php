<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OvertimeRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'reference' => trim($this->reference),
            'account' => trim($this->account),
            'competency' => trim($this->competency),
            'nature' => trim($this->nature),
            'title' => trim($this->title),
            'details' => trim($this->details),
            'week_ending' => trim($this->weekenddate),
            'worker' => trim($this->worker),
            'serial' => trim($this->serial),
            'country' => trim($this->country),
            'hours' => trim($this->hours),
            'status' => trim($this->status),
            '1st Level Approval' => trim($this->approver_first_level),
            '2nd Level Approval' => trim($this->approver_second_level),
            '3rd Level Approval' => trim($this->approver_third_level),
            'requestor' => trim($this->requestor),
            'approval' => trim($this->approval_mode),
            'squad_leader' => trim($this->approver_squad_leader),
            'tribe_leader' => trim($this->approver_tribe_leader),
            'pre' => trim($this->supercedes),
            'post' => trim($this->supercededby),
            'claim Acc' => trim($this->claim_acc_id),
            'created_ts' => trim($this->created_ts)
            /*
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
            'reference' => $this->resource['reference'],
            'reference' => trim($this->reference),
            'requestor' => trim($this->requestor),
            'requested' => trim($this->requested),
            'competency' => trim($this->competency),
            'approvaltype' => trim($this->approvaltype),
            'title' => trim($this->title),
            'account' => trim($this->account),
            'weekenddate' => trim($this->weekenddate),
            'nature' => trim($this->nature),
            'details' => trim($this->details),
            'worker' => trim($this->worker),
            'serial' => trim($this->serial),
            'hours' => trim($this->hours),
            'status' => trim($this->status),
            'rejection' => trim($this->rejection),
            'supercedes' => trim($this->supercedes),
            'supercededby' => trim($this->supercededby),
            'claim_acc_id' => trim($this->claim_acc_id),
            'approver_first_level' => trim($this->approver_first_level),
            'approver_first_level_ts' => trim($this->approver_first_level_ts),
            'approver_second_level' => trim($this->approver_second_level),
            'approver_second_level_ts' => trim($this->approver_second_level_ts),
            'approver_third_level' => trim($this->approver_third_level),
            'approver_third_level_ts' => trim($this->approver_third_level_ts),
            'location' => trim($this->location),
            'recoverable' => trim($this->recoverable),
            'delete_flag' => trim($this->delete_flag),
            'created_ts' => trim($this->created_ts),
            'import' => trim($this->import),
            'approval_first_level_via' => trim($this->approval_first_level_via),
            'approval_second_level_via' => trim($this->approval_second_level_via),
            'approval_third_level_via' => trim($this->approval_third_level_via),
            'approval_mode' => trim($this->approval_mode),
            'approver_squad_leader' => trim($this->approver_squad_leader),
            'approver_tribe_leader' => trim($this->approver_tribe_leader)
            */      
        ];
    }
}
