class CreateCourses < ActiveRecord::Migration
  def change
    create_table :courses do |t|
      t.references :school, index: true
      t.string :name
      t.string :short_description

      t.timestamps
    end
  end
end
