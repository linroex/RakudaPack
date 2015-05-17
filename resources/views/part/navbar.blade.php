<li>
    <div class="btn-group" role="group" >
        <a type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">我要發任務</a>
        <a type="button" class="btn btn-default navbar-btn" href="/">我要接任務</a>
        
    </div>
    <!-- Modal -->
    @include("part.newMission")
</li>
<li>
    <!-- Modal -->
    @include("part.nowMission")
    
</li>
<li class="dropdown">
    @include("part.dropdown")
</li>