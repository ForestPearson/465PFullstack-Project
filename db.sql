CREATE TABLE cards (
	card_id INT NOT NULL,
	card_name TEXT,
	manacost TEXT,
	colors TEXT,
	type TEXT,
	rarity TEXT,
	card_set TEXT,
	multiverseid INT,
	image_url TEXT,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	CONSTRAINT cards_pk PRIMARY KEY("card_id")
);

CREATE TABLE decks (
	id serial NOT NULL,
	account_id INT NOT NULL,
	name TEXT NOT NULL,
	preview TEXT,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	deleted_at TIMESTAMP,
	CONSTRAINT decks_pk PRIMARY KEY("id"),
	CONSTRAINT decks_fk FOREIGN KEY("account_id") REFERENCES "users"("id")
);

CREATE TABLE card_rel (
	id serial NOT NULL,
	deck_id INT NOT NULL,
	card_id INT NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	deleted_at TIMESTAMP,
	CONSTRAINT cards_deck_fk FOREIGN KEY("deck_id") REFERENCES "decks"("id")
);
