[![Latest Stable Version](https://poser.pugx.org/aedart/util/v/stable)](https://packagist.org/packages/aedart/util)
[![Total Downloads](https://poser.pugx.org/aedart/util/downloads)](https://packagist.org/packages/aedart/util)
[![Latest Unstable Version](https://poser.pugx.org/aedart/util/v/unstable)](https://packagist.org/packages/aedart/util)
[![License](https://poser.pugx.org/aedart/util/license)](https://packagist.org/packages/aedart/util)

# Util

This package contains a set of various utility resources, which can be used independently. 

# Contents

  * [How to install](#how-to-install)
  * [Partial Collection](#partial-collection)
    + [Example](#example)
    + [Behind the scenes](#behind-the-scenes)
  * [Contribution](#contribution)
    + [Bug Report](#bug-report)
    + [Fork, code and send pull-request](#fork--code-and-send-pull-request)
  * [Acknowledgement](#acknowledgement)
  * [Versioning](#versioning)
  * [License](#license)

## How to install

```console
composer require aedart/util
```

This package uses [composer](https://getcomposer.org/). If you do not know what that is or how it works, I recommend that you read a little about, before attempting to use this package.

## Partial Collection

If you need to create a concrete collection, that contains specific elements only, then you might find the `IPartialCollection` interface and the `PartialCollectionTrait` useful. 

### Example

In this example, we create a concrete collection which can only contain integer values.

```php
<?php
use Aedart\Util\Interfaces\Collections\IPartialCollection;
use Aedart\Util\Traits\Collections\PartialCollectionTrait;

class MyCollection implements IPartialCollection
{
    use PartialCollectionTrait;

    public function put($key, $value)
    {
        if(!is_int($value)){
            throw new \Exception(sprintf('Value must be of the type integer, %s given', var_export($value, true)));
        }

        $this->getInternalCollection()->put($key, $value);
    }
    
    public function populate(array $data = [])
    {
        // ... Implementation not shown here ...
    }
    
    public function offsetExists($offset)
    {
        // ... Implementation not shown here ...
    }
    
    public function offsetGet($offset)
    {
        // ... Implementation not shown here ...
    }
    
    public function offsetSet($offset, $value)
    {
        // ... Implementation not shown here ...
    }
    
    public function offsetUnset($offset)
    {
        // ... Implementation not shown here ...
    }
}
```

### Behind the scenes

The `PartialCollectionTrait` uses a [`Illuminate\Support\Collection`](https://laravel.com/docs/5.4/collections) and provides internal access to it via the `getInternalCollection()` and
`setInternalCollection()` methods.

In other words, you can choose to form your concrete collections as you see fit, and expose only those methods that you wish.

## Contribution

Have you found a defect ( [bug or design flaw](https://en.wikipedia.org/wiki/Software_bug) ), or do you wish improvements? In the following sections, you might find some useful information
on how you can help this project. In any case, I thank you for taking the time to help me improve this project's deliverables and overall quality.

### Bug Report

If you are convinced that you have found a bug, then at the very least you should create a new issue. In that given issue, you should as a minimum describe the following;

* Where is the defect located
* A good, short and precise description of the defect (Why is it a defect)
* How to replicate the defect
* (_A possible solution for how to resolve the defect_)

When time permits it, I will review your issue and take action upon it.

### Fork, code and send pull-request

A good and well written bug report can help me a lot. Nevertheless, if you can or wish to resolve the defect by yourself, here is how you can do so;

* Fork this project
* Create a new local development branch for the given defect-fix
* Write your code / changes
* Create executable test-cases (prove that your changes are solid!)
* Commit and push your changes to your fork-repository
* Send a pull-request with your changes
* _Drink a [Beer](https://en.wikipedia.org/wiki/Beer) - you earned it_ :)

As soon as I receive the pull-request (_and have time for it_), I will review your changes and merge them into this project. If not, I will inform you why I choose not to.

## Acknowledgement

* [Taylor Otwell](https://github.com/taylorotwell), for creating [Laravel](http://laravel.com) and especially the [Service Container](https://laravel.com/docs/5.4/container), that I'm using daily

## Versioning

This package follows [Semantic Versioning 2.0.0](http://semver.org/)

## License

[BSD-3-Clause](http://spdx.org/licenses/BSD-3-Clause), Read the LICENSE file included in this package