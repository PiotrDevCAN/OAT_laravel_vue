<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\DB;

class Filters extends Component
{
    /*
     * Lists of all available values
     */
    public $accounts;
    public $natures;
    public $workers;
    public $approvalTypes;
    
    public $competencies;
    public $statuses;
    public $requestors;
    public $locations;
    
    public $weekendStartDates;
    public $weekendEndDates;
    public $imports;
    
    public $firstApprovers;
    public $secondApprovers;
    public $thirdApprovers;
    
    public $approvalModes;
    public $approverSquadLeaders;
    public $approverTribeLeaders;
    
    /*
     * Selected values
     */
    public $account;
    public $nature;
    public $worker;
    public $approvalType;
    
    public $competency;
    public $status;
    public $requestor;
    public $location;
    
    public $weekendDateStart;
    public $weekendDateEnd;
    public $import;
    
    public $approverFirstLevel;
    public $approverSecondLevel;
    public $approverThirdLevel;
    
    public $approvalMode;
    public $approverSquadLeader;
    public $approverTribeLeader;
    
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->accounts = OvertimeRequest::accounts();
        $this->natures = OvertimeRequest::natures();
        $this->workers = OvertimeRequest::workers();
        $this->approvalTypes = OvertimeRequest::approvalTypes();
        $this->competencies = OvertimeRequest::competencies();
        $this->statuses = OvertimeRequest::statuses();
        $this->requestors = OvertimeRequest::requestors();
        $this->locations = OvertimeRequest::locations();
        $this->weekendStartDates = OvertimeRequest::weekendStartDates();
        $this->weekendEndDates = OvertimeRequest::weekendEndDates();
        $this->imports = OvertimeRequest::imports();
        $this->firstApprovers = OvertimeRequest::approversFirstLevel();
        $this->secondApprovers = OvertimeRequest::approversSecondLevel();
        $this->thirdApprovers = OvertimeRequest::approversThirdLevel();
        $this->approvalModes = OvertimeRequest::approvalModes();
        $this->approverSquadLeaders = OvertimeRequest::squadLeaders();
        $this->approverTribeLeaders = OvertimeRequest::tribeLeaders();        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.filters');
    }
}
