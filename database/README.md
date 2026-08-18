# WIDMS database setup

Run `php database/migrate.php` from the project root to install or update the complete schema. The runner applies the base schema and every idempotent workflow migration in dependency order.

Run `php database/verify.php` to check required tables and core stock/workflow invariants. Operational tables are intentionally not seeded with dummy records.
