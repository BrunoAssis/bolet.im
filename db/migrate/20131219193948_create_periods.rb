class CreatePeriods < ActiveRecord::Migration
  def change
    create_table :periods do |t|
      t.references :school, index: true
      t.references :year, index: true
      t.integer :order
      t.string :name
      t.string :short_description

      t.timestamps
    end
  end
end
