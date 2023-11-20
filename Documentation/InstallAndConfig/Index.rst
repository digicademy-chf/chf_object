..  include:: /Includes.rst.txt

..  _install-and-config:

==================
Install and config
==================

..  rst-class:: bignums

1.  Install the extension

    Add the package name to your ``composer.json`` or install the package
    manually.

2.  Set up a data folder

    In a blank folder in your page tree, add an ``ObjectResource``. Further
    data, such as volumes and essays, needs to be located in the same data
    folder.

..  _display-the-object-repository:

=============================
Display the object repository
=============================

To show the object repository on a specific page of your website, simply add
the :guilabel:`Objects` plugin and set it up to use the repository in
question.

If you want to be able to only show select objects from your repository, use
the label function built into the extension. You can add a ``Tag`` of type
:guilabel:`Label` to your data folder and then select it in the records you
want it to apply to. You can then select the label in the plugin to display
only those records.
