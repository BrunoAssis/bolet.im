class RemoveSchoolFromTeachers < ActiveRecord::Migration
  def change
    remove_reference :teachers, :school, index: true
  end
end
