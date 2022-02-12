<?php


class FindJobs
{
    public function execute($user)
    {
        if ($user && $user->is(UserType::CUSTOMER)) {
            return $user->jobs()->with('user.userMeta', 'user.average', 'translatorJobRel.user.average', 'language',
                'feedback')->whereIn('status', ['pending', 'assigned', 'started'])->orderBy('due', 'asc')->get();
        }

        $jobs = Job::getTranslatorJobs($user->id, 'new');
        return $jobs->pluck('jobs')->all();
    }
}