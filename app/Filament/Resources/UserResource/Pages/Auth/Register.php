<?php

namespace App\Filament\Resources\UserResource\Pages\Auth;

use App\Filament\Resources\UserResource;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister 
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getRoleFormComponent(), 
                    ])
                    ->statePath('data'),
            ),
        ];
    }
 
    protected function getRoleFormComponent(): Component
    {
        return Select::make('role')
            ->options([
                'buyer' => 'Buyer',
                'seller' => 'Seller',
            ])
            ->default('buyer')
            ->required();
    }
}
