<?php

namespace App\Http\Livewire\Auth\User;


use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure():void 
    {
        $this->setPrimaryKey('id');
    }

    public function columns():array
    {
        return [
            Column::make('ID','id')
            ->sortable(),
            Column::make('Username','username')
            ->sortable()
            ->searchable(),
            Column::make('Nama','name')
            ->sortable()
            ->searchable(),
            Column::make('Email','email')
            ->sortable()
            ->searchable(),
            Column::make('Role','role.description')
            ->sortable()
            ->searchable(),
            Column::make('Kantor','office.name')
            ->sortable()
            ->searchable(),
            ButtonGroupColumn::make('id')
            ->attributes(function($row) {
                return [
                    'class' => 'dropdown d-inline',
                ];
            })
            ->buttons([
                LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'View')
                    ->location(fn($row) => route('auth.user.detail', $row))
                    ->attributes(function($row) {
                        return [
                            'class' => 'dropdown-item has-icon',
                        ];
                    }),

            ])
        ];
    }
    public function query(): Builder
    {
        return User::query();
    }
}
