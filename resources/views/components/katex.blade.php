@props(['expr'])

@php
    $id = Str::ulid();
@endphp

<span id="katex_{{ $id }}"></span>

<script type="module">
    function renderKatex{{ $id }}()
    {
        katex.render(String.raw`{{ $expr }}`,
            document.getElementById("katex_{{ $id }}"),
            { throwOnError: false, output: 'mathml' }
        );
    }

    renderKatex{{ $id }}();

    if (typeof Livewire !== 'undefined') {
        Livewire.hook('morph.updated', ({el, comp}) => {
            // Here is the issue:
            // document.getElementById("katex_{{ $id }}") is null.
            // But the element should, see line 7.
  	        console.log(document.getElementById("katex_{{ $id }}")); // Prints "null"
            renderKatex{{ $id }}();
        });
    }
</script>
