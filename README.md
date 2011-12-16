TODO
====

* ~~Removes books/chapters/sets to all sections~~
* Set is removed
* ~~Set partintro becomes introductory text to first section~~
* ~~Changes ids from foo to php-api-foo, and no xml:id, ex:
    Ours: \<para xml:id="mysql.configure">
    Theirs: \<para id="apis-php-mysql.configure">~~
* ~~Inserts copyright info (a \<para>foo\</para>) under the title of every section~~
* Links to other parts of the manual turn into full URLs ex:
    Ours:   \<link linkend="ini.extension-dir">extension_dir\</link>
    Theirs: \<ulink url="http://www.php.net/manual/en/ini.core.php#ini.extension-dir">extension_dir\</ulink>
    Note: The 'en' depends on translation, but, only using /en/ for all links is fine for now
* Links to external sites: Are not linked except mysql.com links
* ~~<function> tags do not automatically link, so the DocBook ends up like:
    Ours: \<function>mysql_connect</function>
    Theirs: \<link linkend="apis-php-function.mysql-connect">\<function>mysql_connect\</function>\</link>~~
* ~~The following is stripped everywhere (they use DocBook 4.5, us DocBook 5):
    xmlns="http://docbook.org/ns/docbook"~~
* ~~The markup for each function changes. Example:
    refpurpose markup is removed, content is moved into a listitem with the function name as the title
    refsect markup is removed, where a para/emphasis replaces the title~~
* Remove \<titleabrev> and its contents
* ~~Change \<phpdoc:classref id="apis-php-class.mysqli ...> and friends, into the likes of \<section id="apis-php-class.mysqli">~~

##PhD 0.4

* Format: http://pastie.org/2988658
* Theme: http://roshambo.org/phd/phd_theme_docbook.txt

##Configure

* http://roshambo.org/phd/1_import.sh.txt

##Perl Import

* http://roshambo.org/phd/2_php-import-postprocess.pl.txt

##Diffs

* Function Result: http://pastie.org/2988472
* Diff Format: http://pastie.org/2988671
* Diff Result: http://paste2.org/p/1815083
