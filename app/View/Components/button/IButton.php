<?php
    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    interface IButtonCrud {
        public function render() : View|Closure|string;
        public function buildParams();
    }
    interface IButtonModal{

    }
