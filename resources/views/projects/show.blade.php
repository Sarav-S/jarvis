<label><i class="fa fa-pencil"></i> Name</label>
<p>{!! $project->name !!}</p>

<label><i class="fa fa-newspaper-o"></i> Description</label>
<p>{!! $project->description !!}</p>

<label><i class="fa fa-calendar"></i> Due Date</label>
<p>{!! $project->due_date !!}</p>

<label><i class="fa fa-user"></i> Author</label>
<p>{!! $project->user->name !!}</p>

<label><i class="fa fa-calendar"></i> Created Date</label>
<p>{!! $project->created_at !!}</p>

<label><i class="fa fa-calendar"></i> Last Updated On</label>
<p>{!! $project->updated_at !!}</p>