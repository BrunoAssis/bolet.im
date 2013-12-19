class CreateClassrooms < ActiveRecord::Migration
  def change
    create_table :classrooms do |t|
      t.references :school, index: true
      t.references :course, index: true
      t.references :year, index: true
      t.references :period, index: true
      t.string :name

      t.timestamps
    end
  end
end
