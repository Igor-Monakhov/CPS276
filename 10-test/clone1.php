<?php
//* Cloning an object
Class Desease {
    public $deseaseName;
}

Class Cat {
    public $catName;
    public $deseaseInstance;
}

$cat1 = new Cat();
$cat1->catName = 'tabby';

// The next line does not make a copy
// Instead, both $cat1 and $cat2 point to the same instance of Cat
$cat2 = $cat1;
$cat2->catName = 'elvis';

echo($cat1->catName); // prints elvis
echo('<br>');
echo($cat2->catName); // prints elvis
echo('<br>----------<br>');

//-------------------------

$cat1 = new Cat();
$cat1->catName = 'tabby';
$d = new Desease();
$d->deseaseName = 'lime';
$cat1->deseaseInstance = $d;

// Use 'clone' to make a copy of an object.
// But be aware that this will only be a shallow copy.
$cat2 = clone($cat1);
$cat2->catName = 'elvis';

echo($cat1->catName); // prints tabby
echo('<br>');
echo($cat2->catName); // prints elvis
echo('<br>----------<br>');

// Proof that its a shallow copy
$cat1->deseaseInstance->deseaseName = 'lime';
$cat2->deseaseInstance->deseaseName = 'diabetes';

echo($cat1->catName); // prints tabby
echo('<br>');
echo($cat2->catName); // prints elvis
echo('<br>');
echo($cat1->deseaseInstance->deseaseName); // prints diabetes
echo('<br>');
echo($cat2->deseaseInstance->deseaseName); // prints diabetes
echo('<br>----------<br>');






