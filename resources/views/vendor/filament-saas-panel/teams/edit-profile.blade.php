<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament-panels::form.actions
            alignment="right"
            :actions="$this->getUpdateProfileFormActions()"
        />
    </x-filament-panels::form>

    @if(filament()->getPlugin('filament-saas-panel')->editPassword)
        <x-filament-panels::form wire:submit="updatePassword">
            {{ $this->editPasswordForm }}

            <x-filament-panels::form.actions
                alignment="right"
                :actions="$this->getUpdatePasswordFormActions()"
            />
        </x-filament-panels::form>
    @endif

    @if(filament()->getPlugin('filament-saas-panel')->browserSessionManager)
        <x-filament-panels::form>
            {{ $this->browserSessionsForm }}
        </x-filament-panels::form>
    @endif

    @if(filament()->getPlugin('filament-saas-panel')->deleteAccount)
        <x-filament-panels::form>
            {{ $this->deleteAccountForm }}
        </x-filament-panels::form>
    @endif
</x-filament-panels::page>
