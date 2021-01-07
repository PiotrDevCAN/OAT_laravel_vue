<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use App\Models\Account;
use App\Models\Competency;
use App\Models\OvertimeRequest;

class Record extends Component
{
    public $allAccounts;
    public $allVerified;
    public $allLocations;
    public $allCompetencies;
    public $allImports;
    public $allRecoverable;
    public $allNatures;
    public $allWeekends;
    
    /**
     * The record.
     *
     * @var array
     */
    public $record;
    
    /**
     * Create the component instance.
     *
     * @param  Collection  $list
     * @param  boolean  $expand
     * @return void
     */
    public function __construct($record = null)
    {
        $this->allAccounts = Account::accountApproversByLocation();
        $this->allVerified = Account::verifiedAccountByLocation();
        $this->allLocations = Account::verifiedLocations();
        $this->allCompetencies = Competency::competenciesByAccount();
        $this->allImports = OvertimeRequest::imports();
        $this->allRecoverable = OvertimeRequest::recoverables();
        $this->allNatures = OvertimeRequest::natures();
        $this->allWeekends = OvertimeRequest::weekendDates();
        
        $this->record = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.record');
    }
}
