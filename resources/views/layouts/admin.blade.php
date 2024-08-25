<!DOCTYPE html>
<html lang="en">
<livewire:admin.configs.head />
@livewireStyles
<body class="light rtl"  style="overflow: visible;">
<div class="overlay"></div>
<livewire:admin.configs.header />
<div>
    <livewire:admin.configs.sidebar />
</div>
<section class="content">
    <div class="container-fluid">
        {{$slot}}
    </div>
</section>
<livewire:admin.configs.foot />

@livewireScripts
</body>
