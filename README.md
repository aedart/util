## Util ##

This package contains a set of various utility resources, which can be used independently. 

Official website (https://bitbucket.org/aedart/util)

## Contents ##

[TOC]

## How to install ##

```
#!console

composer require aedart/util 1.*
```

This package uses [composer](https://getcomposer.org/). If you do not know what that is or how it works, I recommend that you read a little about, before attempting to use this package.

## Partial Collection ##

If you need to create a concrete collection, that contains specific elements only, then you might find the `IPartialCollection` interface and the `PartialCollectionTrait` useful. 

### Example ###

In this example, we create a concrete collection which can only contain integer values.

```
#!php
<?php
use Aedart\Util\Interfaces\Collections\IPartialCollection;
use Aedart\Util\Traits\Collections\PartialCollectionTrait;

class MyCollection implements IPartialCollection{
    
    use PartialCollectionTrait;

    public function put($key, $value){
        if(!is_int($value)){
            throw new \Exception(sprintf('Value must be of the type integer, %s given', var_export($value, true)));
        }

        $this->getInternalCollection()->put($key, $value);
    }
    
    public function populate(array $data){
        // ... Implementation not shown here ...
    }
    
    public function offsetExists($offset) {
        // ... Implementation not shown here ...
    }
    
    public function offsetGet($offset) {
        // ... Implementation not shown here ...
    }
    
    public function offsetSet($offset, $value) {
        // ... Implementation not shown here ...
    }
    
    public function offsetUnset($offset) {
        // ... Implementation not shown here ...
    }
}
```

### Behind the scenes ###

The `PartialCollectionTrait` uses a [`Illuminate\Support\Collection`](http://laravel.com/docs/5.0/collections) and provides internal access to it via the `getInternalCollection()` and
`setInternalCollection()` methods.

In other words, you can choose to form your concrete collections as you see fit, and expose only those methods that you wish.

## License ##

[BSD-3-Clause](http://spdx.org/licenses/BSD-3-Clause), Read the LICENSE file included in this package