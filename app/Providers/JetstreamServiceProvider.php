<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use App\Support\Enums\LocationPermissions;
use App\Support\Enums\TeamPermissions;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', __('Administrator'), [
            LocationPermissions::CREATE_LOCATION,
            LocationPermissions::VIEW_LOCATION,
            LocationPermissions::UPDATE_LOCATION,
            LocationPermissions::DELETE_LOCATION,
            LocationPermissions::EXPORT_LOCATION,

            TeamPermissions::INVITE_USER,
            TeamPermissions::REMOVE_USER,
            TeamPermissions::UPDATE_TEAM,

        ])->description('Administrator bisa mengedit lokasi dan mengundang anggota tim');

        Jetstream::role('editor', __('Editor'), [
            LocationPermissions::CREATE_LOCATION,
            LocationPermissions::VIEW_LOCATION,
            LocationPermissions::UPDATE_LOCATION,
            LocationPermissions::EXPORT_LOCATION,
        ])->description('Editor bisa mengedit lokasi tapi tidak bisa menghapus');

        Jetstream::role('member', __('Member'), [
            LocationPermissions::VIEW_LOCATION,
            LocationPermissions::EXPORT_LOCATION,
        ])->description('Member bisa melihat dan mengexport lokasi');
    }
}
