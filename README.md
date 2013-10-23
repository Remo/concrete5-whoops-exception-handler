concrete5-whoops-error-handler
==============================

concrete5 module for https://github.com/filp/whoops

it doesn't work perfectly fine in every case due to the fact that we can't influence the loading order of packages. It might happen that a package throwing an exception gets loaded before this package in which case you won't get any benefit from whoops.