<label><i class="fa fa-pencil"></i> Name</label>
<p>{!! $task->name !!}</p>

<label><i class="fa fa-newspaper-o"></i> Description</label>
<p>{!! $task->description !!}</p>

<label><i class="fa fa-calendar"></i> Due Date</label>
<p>{!! $task->due_date !!}</p>

<label><i class="fa fa-tag"></i> Category</label>
<p>{!! $task->category->name !!}</p>

<label><i class="fa fa-suitcase"></i> Project</label>
<p>{!! $task->project->name !!}</p>

<label><i class="fa fa-user"></i> Author</label>
<p>{!! $task->user->name !!}</p>

<label><i class="fa fa-calendar"></i> Created Date</label>
<p>{!! $task->created_at !!}</p>

<label><i class="fa fa-calendar"></i> Last Updated On</label>
<p>{!! $task->updated_at !!}</p>