# Libphonenumber shortcuts

Provide shortcuts to use famous [libphonenumber](https://github.com/giggsey/libphonenumber-for-php) functions most quickly and easily.  
Exceptions are voluntarily catched because the goal is to use this only in final context (displaying for example). 

### Installation

``` 
composer req damien-louis/libphonenumber-shortcuts
```

### Format

Return `string` or `null`
If something is invalid (bad number, unknown format or region), result is `null`
```
//06 05 04 03 02
$result = \PhoneNumberShortcuts::format('+33605040302', PhoneNumberShortcuts::NATIONAL);

//+33 6 05 04 03 02
$result = \PhoneNumberShortcuts::format('0605040302', PhoneNumberShortcuts::INTERNATIONAL, 'FR');
```

### Validation
Return `boolean`  
```
//true
$isValid = \PhoneNumberShortcuts::isValid('+33 607080910');

//true
$isValid = \PhoneNumberShortcuts::isValid('+33 607080910', 'FR');

//false
$isValid = \PhoneNumberShortcuts::isValid('+1607080910', 'FR');
```
### Region Code
Return `string` or `null`
```
//GB
$result = \PhoneNumberShortcuts::getRegionCodeForNumber('+44 117 496 0123');

//FR
$result = \PhoneNumberShortcuts::getRegionCodeForNumber('+33 1 02 03 04 05');

//US
$result = \PhoneNumberShortcuts::getRegionCodeForNumber('+12135096995');

//null
$result = \PhoneNumberShortcuts::getRegionCodeForNumber('notanumber');
```
