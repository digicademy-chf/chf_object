..  include:: /Includes.rst.txt

..  _data-model:

==========
Data model
==========

All records of an object repository are held together by a single
``ObjectResource`` which holds the main classes ``SingleObject``,
``ObjectGroup``, ``Location``, ``Period``, ``Agent``, and ``Tag``. The class
``SingleObject`` has a set of fields that contain information of physical
objects and includes the option to add, for example, image representations and
schematics. A common serialisation for objects is the LIDO format.

``Feature`` and ``MapResource`` may be used across the model to add geodata
and image maps. ``Period`` objects are used to add object biographies.
``Agent`` objects can be added in various roles via an ``AuthorshipRelation``.

In addition, the model knows flexible ``LabelTag`` and ``SameAs`` classes,
which can be used to group objects and other records via labels and to connect
entities to authority files.

..  _graphical-overview:

Graphical overview
==================

..  figure:: /DataModel/DataModel.png
    :alt: Data model of the extension
    :target: ../_images/DataModel.png
    :class: with-shadow

    Overview of the extension's data model. Check the :ref:`api-reference`
    for further details.
