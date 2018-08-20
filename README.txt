

"It reposi"


R.B. Repository D8
=====

Tool to import and aggregation publications for Drupal 8.
https://www.drupal.org/sandbox/module_ortiz/2731405

Features
========

This module aims to simplify the capture bibliographic information.
The information is displayed in descending order by publication’s year and title.
There are seven types of content:

- Article.
- Book.
- Chapter Book.
- Conference paper.
- Thesis.
- Patent.
- Software.

There is a search option on the list of publications. This looks for
matches between the words entered and title of existing publications.

- Import -

This function allow get metadata publications through Scopus API.
The stored data correspond to publications of the repository users
and with Scopus ID Author.

This function allow get metadata publications through Google Scholar.
The stored data correspond to publications of the repository users
and with Google Scholar ID Author. These publications must be classified later.

The frequency of search is select of the administrator. He/She have
four options: Never, 1 month, 3 months or 6 months. If choice never,
he/she can shot the search manually. The manual search does not
interfere with the times of the automatic service.

- Exporting Results -

Each content type offers the option to display the metadata in formats
such as RIS and BibTex. If you need to see the a format, you must
select the link at the list of publications or detailed information.


Requirements
============

- Drupal 8.x
  http://drupal.org/project/drupal
- PHP 7.0 or higher.


Installation
============

- Install R.B. Repository, Repository - Bibtex, Repository - Scopus
  Search API - Repository - Google Scholar API.
- To get started go to Configuration -> Content authoring ->
  Configuration to API Scopus.
- Complete the form to use API.
-- API Key.
-- Size to query.
-- Automatic execution.
- To get started go to Configuration -> Content authoring ->
  Configuration to API Google Scholar.
- Complete the form to use API.
-- Configure URL API.
-- Size to query.
-- Automatic execution.


Feature modules
===============

With R.B. Repository you can add publication's metadata and manage them.

The users are important on Repository - Scopus Search API.

The navigation menu have the functions. (administrator)
- Authors list
- Find ID author on Scopus (Repository - Scopus Search API)
- Import metadata from documents (Repository - Scopus Search API)
- Keywords list
- Publication list
-- Publication list by publication’s type
- User list
-- User active list
-- User inactive list

Here is a description of the provided feature modules:

- Repository - Google Scholar API -

The publication's metadata type article, book, chapter book, thesis,
patent, conference and software can by import through Google Scholar API. The
search can by shot manually or automatically. On the
configuration, the administrator decide the rank time.

The users are the authors that search on Google Scholar Data Base to link
up the publications. The field Google Scholar ID Author is the central point
on the search.

- Repository - Bibtex -


The publications have with one export format, this allow other
format, BibTeX on this case.

- Repository - Scopus Search API -

The publication's metadata type article can by import through Scopus API. The
search and storage can by shot manually or automatically. On the
configuration, the administrator decide the rank time.

The users are the authors that search on Scopus Data Base to link
up the publications. The field Scopus ID Author is the central point
on the search.


Developers Version on Drupal 8
===============================

Andrea Patricia Quirá Ordoñez
andreaqo@unicauca.edu.co

Juan David Lara Rengifo
jdlara@unicauca.edu.co

Developers Version on Drupal 7
===============================

Fabián Ortiz Collazos
fabianortiz@unicauca.edu.co

Beatriz Elena Hurtado Hurtado
beatrizhurtado@unicauca.edu.co
