<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, News $news)
    {
        //
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, News $news)
    {
        return $user->id==$news->user_id;
    }
    public function delete(User $user, News $news)
    {
        return $user->id==$news->user_id;
    }
    public function removeImage(User $user, News $news){
        if($this->update($user, $news)){
            return false;
        }
        return $news->image_path!=null;
    }
}
