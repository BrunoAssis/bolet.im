class CreateSubjects < ActiveRecord::Migration
  def change
    create_table :subjects do |t|
      t.references :school, index: true
      t.string :name
      t.string :short_description

      t.timestamps
    end
  end
end
