<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use App\Support\Enums\TeamPermissions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function view(User $user, Team $team)
    {
        return $user->belongsToTeam($team);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function update(User $user, Team $team)
    {
        if($user->hasPermission(TeamPermissions::UPDATE_TEAM) && $user->currentTeam->id == $team->id){
            return Response::allow();
        }

        if($user->ownsTeam($team)){
            return Response::allow();
        }

        Return Response::deny('Anda tidak bisa mengubah tim!');
    }

    /**
     * Determine whether the user can add team members.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function addTeamMember(User $user, Team $team)
    {
        if($user->hasPermission(TeamPermissions::INVITE_USER) && $user->currentTeam->id == $team->id){
            return Response::allow();
        }

        if($user->ownsTeam($team)){
            return Response::allow();
        }

        Return Response::deny('Anda tidak bisa mengundang anggota tim!');

    }

    /**
     * Determine whether the user can update team member permissions.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function updateTeamMember(User $user, Team $team)
    {
        return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can remove team members.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function removeTeamMember(User $user, Team $team)
    {
        if($user->hasPermission(TeamPermissions::REMOVE_USER) && $user->currentTeam->id == $team->id){
            return Response::allow();
        }

        if($user->ownsTeam($team)){
            return Response::allow();
        }

        Return Response::deny('Anda tidak bisa menghapus anggota tim!');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Team $team
     * @return mixed
     */
    public function delete(User $user, Team $team)
    {
        return $user->ownsTeam($team);
    }
}
