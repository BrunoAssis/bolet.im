class RemoveSchoolFromClassrooms < ActiveRecord::Migration
  def change
    remove_reference :classrooms, :school, index: true
  end
end
