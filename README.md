# TEAPy

## Dev Notes
Autocomplete.

Incluir esto en el controlador del componente padre para capturar el valor del input

```
    public $name;
    protected $listeners = [ 'userSelected' ];
    
    public function userSelected($value)
    {
        $this->name = $value;
    }

```

Incluir componente
```
   <livewire:components.autocomplete.user />

```