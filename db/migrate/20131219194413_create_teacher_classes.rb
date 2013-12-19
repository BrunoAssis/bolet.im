class CreateTeacherClasses < ActiveRecord::Migration
  def change
    create_table :teacher_classes do |t|
      t.references :school, index: true
      t.references :teacher, index: true
      t.references :subject, index: true
      t.references :classroom, index: true
      t.string :weekday
      t.time :start_time
      t.time :end_time

      t.timestamps
    end
  end
end
