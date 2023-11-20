..  include:: /Includes.rst.txt

..  _data-model:

==========
Data model
==========

All records of an object repository are held together by a single
``ObjectResource`` which holds the main classes ``Object``, ``ObjectGroup``,
``Location``, ``Period``, ``Agent``, and ``Tag``. The class ``Object`` has a
set of fields that contain information of physical objects and includes the
option to add, for example, image representations and schematics. A common
serialisation for objects is the LIDO format.

``Feature``s and ``MapResource``s may be used across the model to add geodata
and image maps. ``Period``s are used to add object biographies. ``Agents`` can
be added in various roles via an ``AuthorshipRelation``.

In addition, the model knows flexible ``LabelTag``s and ``SameAs`` classes,
which can be used to group objects and other records via labels and to connect
entities to authority files.

..  _graphical-overview:

Graphical overview
==================

..  figure:: /DataModel/DataModel.png
    :alt: Data model of the extension
    :target: /DataModel/DataModel.png
    :class: with-shadow

    Overview of the extension's data model. Check the :ref:`api-reference`
    for further details.
