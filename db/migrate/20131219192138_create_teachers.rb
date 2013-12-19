class CreateTeachers < ActiveRecord::Migration
  def change
    create_table :teachers do |t|
      t.references :school, index: true
      t.references :user, index: true
      t.string :name

      t.timestamps
    end
  end
end
