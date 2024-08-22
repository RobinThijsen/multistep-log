<?php

namespace App\Livewire;

use App\Livewire\Forms\StepOneForm;
use App\Livewire\Forms\StepThreeForm;
use App\Livewire\Forms\StepTwoForm;
use App\Models\Plan;
use App\Models\PlanRecurrence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Session;
use Livewire\Component;

class MultistepRegister extends DefaultComponent
{
    #[Session]
    public $steps = [];
    #[Session]
    public ?StepOneForm $stepOneForm;
    #[Session]
    public ?StepTwoForm $stepTwoForm;
    #[Session]
    public ?StepThreeForm $stepThreeForm;
    #[Session]
    public $feedback = false;

    public function mount()
    {
        if (empty($this->steps)) {
            $this->steps = [
                1 => [
                    'index' => 1,
                    'title' => 'Your info',
                    'active' => true,
                    'done' => false,
                ],
                2 => [
                    'index' => 2,
                    'title' => 'Select plan',
                    'active' => false,
                    'done' => false,
                ],
                3 => [
                    'index' => 3,
                    'title' => 'Add-ons',
                    'active' => false,
                    'done' => false,
                ],
                4 => [
                    'index' => 4,
                    'title' => 'Summary',
                    'active' => false,
                    'done' => false,
                ],
                5 => [
                    'index'=> 5,
                    'title' => 'Success',
                    'active' => false,
                    'done' => false,
                ],
            ];
        }
    }

    public function navigate($index)
    {
        $activeIndex = $this->getActiveStep();
        switch ($activeIndex) {
            case 1:
                if ($this->steps[$activeIndex]['done'])
                    $this->stepOneForm->submit();
                break;
            case 2:
                if ($this->steps[$activeIndex]['done'])
                    $this->stepTwoForm->submit();
                break;
            case 3:
                if ($this->steps[$activeIndex]['done'])
                    $this->stepThreeForm->submit();
                break;
        }

        if ($this->canNavigate($index)) {
            $this->resetStepActive();
            $this->steps[$index]['active'] = true;
        }
    }

    public function canNavigate($index)
    {
        if ($index != $this->getActiveStep()) {
            if ($this->steps[$index]['done']) {
                return true;
            }

            if (isset($this->steps[$index - 1]) && $this->steps[$index - 1]['done']) {
                return true;
            }
        }

        return false;
    }

    public function submitStep()
    {
        sleep(1);

        $activeIndex = $this->getActiveStep();

        match ($activeIndex) {
            1 => $this->stepOneForm->submit(),
            2 => $this->stepTwoForm->submit(),
            3 => $this->stepThreeForm->submit(),
            4 => $this->submit(),
        };

        $this->nextStep($activeIndex);
    }

    private function submit()
    {
        $user = User::create([
            'plan_id' => $this->stepTwoForm->plan_id,
            'plan_recurrence_id' => $this->stepTwoForm->is_recurrence_yearly ? PlanRecurrence::YEARLY : PlanRecurrence::MONTHLY,
            'name' => $this->stepOneForm->name,
            'email' => $this->stepOneForm->email,
            'phone' => $this->stepOneForm->phone,
            'password' => Hash::make($this->stepOneForm->password),
            'email_verified_at' => Carbon::now(),
            'plan_started_at' => Carbon::now(),
            'plan_ended_at' => $this->stepTwoForm->is_recurrence_yearly ? Carbon::now()->addYear() : Carbon::now()->addMonth(),
        ]);

        $user->planAddons()->attach($this->stepThreeForm->addons);

        $this->feedback = true;

        Auth::login($user);
    }

    public function prevStep()
    {
        if (isset($this->steps[$this->getActiveStep() - 1])) {
            $this->navigate($this->getActiveStep() - 1);
        }
    }

    private function nextStep($activeIndex)
    {
        $this->steps[$activeIndex]['done'] = true;

        if (isset($this->steps[$activeIndex + 1])) {
            $this->resetStepActive();
            $this->steps[$activeIndex + 1]['active'] = true;
        }
    }

    public function getActiveStep()
    {
        foreach ($this->steps as $step) {
            if ($step['active'])
                return $step['index'];
        }

        return null;
    }

    private function resetStepActive()
    {
        foreach ($this->steps as $index => $step) {
            $this->steps[$index]['active'] = false;
        }
    }

    public function getTotalPrice()
    {
        $price = 0;
        $plan = Plan::find($this->stepTwoForm->plan_id);

        $price += $this->stepTwoForm->is_recurrence_yearly
            ? $plan->yearly_price
            : $plan->monthly_price;

        foreach ($this->stepThreeForm->planAddons as $planAddon) {
            $price += $this->stepTwoForm->is_recurrence_yearly
                ? $planAddon->yearly_price
                : $planAddon->monthly_price;
        }

        return $this->stepTwoForm->is_recurrence_yearly
            ? "$$price/yr"
            : "$$price/mo";
    }

    public function render()
    {
        return view('livewire.multistep-register');
    }
}
