USE widms;

ALTER TABLE inventory_items ADD COLUMN IF NOT EXISTS category VARCHAR(100) NOT NULL DEFAULT 'General Aid' AFTER item_name;
ALTER TABLE inventory_items ADD COLUMN IF NOT EXISTS lifecycle_status ENUM('stored', 'given-to-procedure') NOT NULL DEFAULT 'stored' AFTER variety;

UPDATE inventory_items SET category = 'Mobility Aid' WHERE item_name IN ('Wheelchair', 'Tricycle', 'Crutches');
UPDATE inventory_items SET category = 'Vision Aid' WHERE item_name IN ('Glasses', 'Spectacles');
UPDATE inventory_items SET category = 'Medical Aid' WHERE item_name = 'Hearing Aid';
UPDATE inventory_items SET lifecycle_status = 'given-to-procedure' WHERE item_name = 'Wheelchair';
