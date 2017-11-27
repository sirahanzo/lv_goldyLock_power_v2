<div class="row navbar-static-top" style="overflow: auto;position: fixed;background-color: #fff;">
    <div class="btn-group btn-group-justified">
        <a href="#" class="btn btn-sm btn-default" disabled>Rectifier</a>

        @for ($i = 1; $i < 17; $i++)
            <a href="#" class="rect btn btn-sm blue {{ ($i == 1)? 'active':'' }}" id="rect{{ $i }}" onclick="get_rect({{ $i }})">{{ $i }}</a>
        @endfor
        <input type="hidden" id="rectifier_id" >
    </div>

</div>

