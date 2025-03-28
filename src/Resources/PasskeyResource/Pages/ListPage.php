<?php

namespace Moox\Passkey\Resources\PasskeyResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Moox\Core\Traits\Tabs\HasListPageTabs;
use Moox\Passkey\Models\Passkey;
use Moox\Passkey\Resources\PasskeyResource;
use Moox\Passkey\Resources\PasskeyResource\Widgets\PasskeyWidgets;
use Override;

class ListPage extends ListRecords
{
    use HasListPageTabs;

    public static string $resource = PasskeyResource::class;

    protected function getActions(): array
    {
        return [];
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            // PasskeyWidgets::class,
        ];
    }

    #[Override]
    public function getTitle(): string
    {
        return __('passkey::translations.title');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->using(fn (array $data, string $model): Passkey => $model::create($data)),
        ];
    }

    public function getTabs(): array
    {
        return $this->getDynamicTabs('passkey.resources.passkey.tabs', Passkey::class);
    }
}
