<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;
use App\Support\Enums\LocationPermissions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LocationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->hasPermission(LocationPermissions::VIEW_LOCATION)){
            return Response::allow();
        }
        return Response::deny('Tidak bisa melihat lokasi');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $location
     * @return mixed
     */
    public function view(User $user, Location $location)
    {
        if($user->hasPermission(LocationPermissions::VIEW_LOCATION) && $user->currentTeam->id == $location->team_id){
            return Response::allow();
        }

        return Response::deny('Anda tidak punya akses melihat lokasi ini!');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission(LocationPermissions::CREATE_LOCATION)){
            return Response::allow();
        }

        return Response::deny('Anda tidak diperbolehkan membuat lokasi baru!');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $location
     * @return mixed
     */
    public function update(User $user, Location $location)
    {
        if($user->hasPermission(LocationPermissions::UPDATE_LOCATION) && $user->currentTeam->id == $location->team_id){
            return Response::allow();
        }

        return Response::deny('Anda tidak punya akses mengedit lokasi ini!');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $location
     * @return mixed
     */
    public function delete(User $user, Location $location)
    {
        if($user->hasPermission(LocationPermissions::DELETE_LOCATION) && $user->currentTeam->id == $location->team_id){
            return Response::allow();
        }

        return Response::deny('Anda tidak punya akses menghapus lokasi ini!');
    }

    /**
     * @param User $user
     * @param Location $location
     * @return Response
     */
    public function export(User $user, Location $location)
    {
        if($user->hasPermission(LocationPermissions::EXPORT_LOCATION) && $user->currentTeam->id == $location->team_id){
            return Response::allow();
        }

        return Response::deny('Anda tidak punya akses mengexport lokasi ini!');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $location
     * @return mixed
     */
    public function restore(User $user, Location $location)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $location
     * @return mixed
     */
    public function forceDelete(User $user, Location $location)
    {
        //
    }
}
