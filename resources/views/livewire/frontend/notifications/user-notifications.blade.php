<div>
    <h4>Paramètres de notifications</h4>
    <ul>
        @foreach($settings as $type => $enabled)
            <li>
                <label>
                    <input type="checkbox" wire:click="toggleSetting('{{ $type }}')" {{ $enabled ? 'checked' : '' }}>
                    {{ ucfirst(str_replace('_', ' ', $type)) }} Notifications
                </label>
            </li>
        @endforeach
    </ul>

    <h4>Mes notifications</h4>
    <ul>
        @foreach($notifications as $notification)
            <li @if(!$notification->read_at) style="font-weight:bold;" @endif>
                {{ $notification->type }} - {{ $notification->data['message'] ?? '' }}
                <small>{{ $notification->created_at->diffForHumans() }}</small>
            </li>
        @endforeach
    </ul>
</div>
