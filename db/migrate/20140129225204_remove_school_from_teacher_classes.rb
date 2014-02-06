class RemoveSchoolFromTeacherClasses < ActiveRecord::Migration
  def change
    remove_reference :teacher_classes, :school, index: true
  end
end
