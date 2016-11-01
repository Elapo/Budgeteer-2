php vendor/doctrine/orm/bin/doctrine orm:schema-tool:drop --force
php vendor/doctrine/orm/bin/doctrine orm:schema-tool:create

REM vendor/doctrine/orm/bin/doctrine orm:schema-tool:update --force
REM use --dump-sql to view generated sql