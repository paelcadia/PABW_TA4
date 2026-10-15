<div style="
    border: 1px solid {{ $type === 'error' ? 'red' : 'green' }};
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
">
    <strong>{{ ucfirst($type) }}:</strong>
    {{ $message }}
</div>