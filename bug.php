In PHP, a common yet subtle error arises when dealing with object references and modifications within functions.  Consider this scenario:

```php
class MyClass {
    public $value = 0;
}

function modifyObject(MyClass $obj) {
    $obj->value = 10;
}

$myObject = new MyClass();
echo $myObject->value; // Outputs 0
modifyObject($myObject);
echo $myObject->value; // Outputs 10 (as expected)
}
```

This works as intended because the function modifies the object directly. However, if you attempt to modify the object by assigning a *new* object to the parameter, the original object remains unchanged:

```php
class MyClass {
    public $value = 0;
}

function modifyObject(MyClass $obj) {
    $obj = new MyClass(); // Assigns a NEW object to the parameter
    $obj->value = 10;
}

$myObject = new MyClass();
echo $myObject->value; // Outputs 0
modifyObject($myObject);
echo $myObject->value; // Still outputs 0! Unexpected.
}
```

The function's scope only affects its local copy of the reference. The original object remains untouched.

Another subtle issue can arise when working with arrays passed as references. If you reassign the array within the function, the original array pointer will not change, which might lead to unexpected behavior. 