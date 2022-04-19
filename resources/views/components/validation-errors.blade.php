@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if(empty($errors->first('image0')))
                <li>用途・工事内容・画像及び画像説明文に誤りがないか確認してください。</li>
            @endif
        </ul>
    </div>
@endif
