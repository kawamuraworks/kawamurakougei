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

            @if(empty($errors->first('type1')))
                <li>用途1を再度、選択してください。</li>
            @endif

            @if(empty($errors->first('content_tag1')))
                <li>工事内容1を再度、選択してください。</li>
            @endif

            @if(empty($errors->first('image0')))
                <li>画像ファイルを再度、選択してください。</li>
            @endif
        </ul>
    </div>
@endif
