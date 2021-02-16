<div class="tray-dialogs">
    <div class="ui-tray splash">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close cursor-ptr close-all-tray"></i>
            <h2>{{ $title }}</h2>
        </div>
        <div class="data-info-body">
            <div class="data-message pb-10">
                <p>{{ $message }}</p>
            </div>
            <div class="data-item cursor-ptr close-current open-view open-user-info" wire:click="$emit('{{ $emitAction }}', {{ $modelId }})">
                <a href="#" class="data-info-action">@lang('global.view') {{ $model }}</a>
            </div>
            @if($routeAnother)
                <div class="data-item cursor-ptr div-href" data-url="{{ route($routeAnother) }}">
                    <a href="{{ route($routeAnother) }}" class="data-info-action">@lang('global.create_another')</a>
                </div>
            @endif
            <div class="data-item cursor-ptr close-all-tray">
                <a href="#" class="data-info-action">@lang('global.okay')</a>
            </div>
        </div>
    </div>
</div>
